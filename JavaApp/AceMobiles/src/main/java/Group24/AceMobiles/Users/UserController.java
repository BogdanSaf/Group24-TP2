package Group24.AceMobiles.Users;

import Group24.AceMobiles.Employee.Employees;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.math.BigInteger;
import java.util.Objects;

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

        if (userRepository.findById(user.getUserId()).isEmpty()) {
            String errorMessage = "User does not exist";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/";
        }

//        This gets the user from the database using the email from the form and checks if the user id is the same as the one being updated
        if (!Objects.equals(userRepository.findByEmail(user.getEmail()).getUserId(), user.getUserId())) {
            String errorMessage = "Email already exists";
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

        if (userRepository.findById(id).isEmpty()) {
            String errorMessage = "User does not exist";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/";
        }

        userRepository.deleteById(id);
        String successMessage = "User deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/";
    }

    @GetMapping("/add-user-form")
    public ModelAndView addUserForm() {
        ModelAndView mav = new ModelAndView("users/add_user");
        mav.addObject("user", new Users());
        return mav;
    }

    @PostMapping("/add-user")
    public String addUser(@Valid @ModelAttribute Users user, BindingResult bindingResult, RedirectAttributes ra) {

        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/";
        }

        if (user.getPhoneNumber().length() != 11) {
            String errorMessage = "Phone number must be 11 digits";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/";
        }

        if (userRepository.findByEmail(user.getEmail()) != null) {
            String errorMessage = "Email already exists";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/";
        }

        BCryptPasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        user.setPassword(passwordEncoder.encode(user.getPassword()));

        userRepository.save(user);
        String successMessage = "User added successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/";
    }


}
