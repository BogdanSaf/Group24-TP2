package Group24.AceMobiles.Orders;

import Group24.AceMobiles.OrderContents.BasketOrderContentsRepository;
import Group24.AceMobiles.Product.Product;
import Group24.AceMobiles.Users.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.math.BigInteger;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Calendar;
import java.util.Date;

@Controller
public class OrderController {

    @Autowired
    private OrderRepository orderRepository;

    @Autowired
    private BasketOrderContentsRepository basketOrderContentsRepository;

    @Autowired
    private UserRepository usersRepository;

    @GetMapping("/orders")
    public ModelAndView orders() {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.addObject("orders", orderRepository.findAll());
        modelAndView.setViewName("orders/orders");
        return modelAndView;
    }

    @GetMapping("/orders/delete/{id}")
    public String deleteOrder(@PathVariable BigInteger id, RedirectAttributes ra) {

        if (basketOrderContentsRepository.findByOrderId(id).isEmpty()) {
            String errorMessage = "No order found with this id " + id;
            ra.addFlashAttribute("message", errorMessage);
            return "redirect:/orders";
        }
        basketOrderContentsRepository.deleteByOrderID(id);
        orderRepository.deleteById(id);
        String successMessage = "Order deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/orders";
    }

    @GetMapping("/orders/viewItems/{id}")
    public ModelAndView viewItems(@PathVariable BigInteger id, RedirectAttributes ra) {
        ModelAndView modelAndView = new ModelAndView("orders/orderProducts");

        Orders userThatOrdered = orderRepository.findById(id).get();

        if (basketOrderContentsRepository.findByOrderId(id).isEmpty()) {
            String errorMessage = "No items found for this order " + id;
            ra.addFlashAttribute("message", errorMessage);
            return new ModelAndView("redirect:/orders");
        }

        modelAndView.addObject("orderItems", basketOrderContentsRepository.findByOrderId(id));
        modelAndView.addObject("userThatOrdered", userThatOrdered);
        return modelAndView;
    }

    @GetMapping("/orders/item/delete/{id}/{productId}")
    public String deleteItem(@PathVariable BigInteger id,@PathVariable BigInteger productId, RedirectAttributes ra) {
        basketOrderContentsRepository.deleteByOrderAndProductID(id, productId);
        String successMessage = "Item deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/orders/viewItems/" + id;
    }

    @GetMapping("/orders/show/{id}")
    public ModelAndView getOrderById(@PathVariable BigInteger id, RedirectAttributes ra ){
        ModelAndView modelAndView = new ModelAndView("orders/specific_order");
        Orders order = orderRepository.findById(id).get();

        //Uses calendar to get order date and add 7 days to it
        Calendar calendar = new Calendar.Builder().setInstant(order.getOrderDate()).build();
        calendar.add(Calendar.DATE, 7);

        //Used to Convert calendar to string in a Year-Month-Day format
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");

        //Gets the date from the calendar and converts it to a string using the dateFormat
        String date = dateFormat.format(calendar.getTime());
        modelAndView.addObject("minDate", date);
        modelAndView.addObject("order", order);
        return modelAndView;
    }

    @PostMapping("/orders/update/{id}")
    public String updateOrderById(@RequestParam("customerEmail") String email,@PathVariable BigInteger id ,@Valid @ModelAttribute Orders order, BindingResult bindingResult, RedirectAttributes ra){
        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/orders";
        }

        order.setOrderId(id);
        order.setUserIdfk(usersRepository.findByEmail(email));
        orderRepository.save(order);
        String successMessage = "Order updated successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/orders";
    }
}
