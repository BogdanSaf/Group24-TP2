package Group24.AceMobiles.Orders;

import Group24.AceMobiles.Users.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class OrderController {

    @Autowired
    private OrderRepository orderRepository;

    @GetMapping("/orders")
    public ModelAndView orders() {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.addObject("orders", orderRepository.findAll());
        modelAndView.setViewName("orders");
        return modelAndView;
    }
}
