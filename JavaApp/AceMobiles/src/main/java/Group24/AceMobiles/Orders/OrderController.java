package Group24.AceMobiles.Orders;

import Group24.AceMobiles.OrderContents.BasketOrderContents;
import Group24.AceMobiles.OrderContents.BasketOrderContentsRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.math.BigInteger;
import java.util.List;

@Controller
public class OrderController {

    @Autowired
    private OrderRepository orderRepository;
    private BasketOrderContentsRepository basketOrderContentsRepository;

    @GetMapping("/orders")
    public ModelAndView orders() {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.addObject("orders", orderRepository.findAll());
        modelAndView.setViewName("orders");
        return modelAndView;
    }

    @GetMapping("/orders/delete/{id}")
    public String deleteOrder(@PathVariable BigInteger id, RedirectAttributes ra) {
        orderRepository.deleteById(id);
        String successMessage = "Order deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/orders";
    }

    @GetMapping("/orders/viewItems/{id}")
    public ModelAndView viewItems(@PathVariable BigInteger id, RedirectAttributes ra) {
        System.out.println("Order ID: " + id);
        ModelAndView modelAndView = new ModelAndView("orderProducts");
        List<BasketOrderContents> orderedItems = basketOrderContentsRepository.findByOrderId(String.valueOf(id));

        if (orderedItems.isEmpty()) {
            String errorMessage = "No items found for this order " + id;
            ra.addFlashAttribute("message", errorMessage);
            return new ModelAndView("redirect:/orders");
        }

        modelAndView.addObject("orderItems", orderedItems);
        return modelAndView;
    }
}
