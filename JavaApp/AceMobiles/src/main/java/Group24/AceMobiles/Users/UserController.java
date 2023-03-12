package Group24.AceMobiles.Users;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.servlet.ModelAndView;

import java.math.BigInteger;

@Controller
public class UserController {

    @Autowired
    private UserRepository userRepository;

    @GetMapping({"/",})
    public ModelAndView getAllUsers() {
        ModelAndView mav = new ModelAndView("users");
        mav.addObject("users", userRepository.findAll());
        return mav;
    }

    @GetMapping({"/{id}",})
    public ModelAndView getUserById(@PathVariable BigInteger id) {
        ModelAndView mav = new ModelAndView("specific_user");
        mav.addObject("single_user", userRepository.findById(id).get());
        return mav;
    }
}
