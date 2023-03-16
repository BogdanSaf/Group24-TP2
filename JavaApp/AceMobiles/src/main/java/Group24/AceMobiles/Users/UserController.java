package Group24.AceMobiles.Users;

import Group24.AceMobiles.Employee.Employees;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.math.BigInteger;

@Controller
public class UserController {

    @Autowired
    private UserRepository userRepository;

    @GetMapping({"/",})
    public ModelAndView getAllUsers() {
        ModelAndView mav = new ModelAndView("users/users");
        mav.addObject("users", userRepository.findAll());
        return mav;
    }

    @GetMapping({"/{id}",})
    public ModelAndView getUserById(@PathVariable BigInteger id) {
        ModelAndView mav = new ModelAndView("users/specific_user");
        mav.addObject("single_user", userRepository.findById(id).get());
        return mav;
    }

    @PostMapping("/update/{id}")
    public String updateUserById(@Valid @ModelAttribute Users user, BindingResult bindingResult, RedirectAttributes ra) {



        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/";
        }



        if (user.getPhoneNumber().length() != 11) {
            String errorMessage = "Phone number must be 11 digits";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/";
        }

        userRepository.save(user);
        String successMessage = "User updated successfully";
        ra.addFlashAttribute("message", successMessage);

        return "redirect:/";

    }

    @GetMapping ("/delete/{id}")
    public String deleteUserById(@PathVariable BigInteger id, RedirectAttributes ra) {
        userRepository.deleteById(id);
        String successMessage = "User deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/";
    }


}
