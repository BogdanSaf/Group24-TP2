package Group24.AceMobiles.Employee;

import Group24.AceMobiles.Product.Product;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.repository.query.Param;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.math.BigInteger;
import java.sql.SQLOutput;
import java.util.List;

@Controller
public class EmployeeControler {

    @Autowired
    private EmployeeRepository employeeRepository;

    @GetMapping({"/employees",})
    public ModelAndView getAllUsers() {
        ModelAndView mav = new ModelAndView("employees/employees");
        mav.addObject("employees", employeeRepository.findAll());
        return mav;
    }

    @GetMapping({"/employees/{id}",})
    public ModelAndView getEmployeeById(@PathVariable BigInteger id){
        ModelAndView mav = new ModelAndView("employees/specific_employee");
        mav.addObject("employee", employeeRepository.findById(id).get());
        return mav;
    }


    @PostMapping("/employees/update/{id}")
    public String updateEmployeeById(@PathVariable BigInteger id,@Valid @ModelAttribute Employees employee, BindingResult bindingResult, RedirectAttributes ra) {


        System.out.println(employee.getEmployeeId());

        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/employees";
        }

        if (employeeRepository.findById(id).isEmpty()){
            String errorMessage = "Employee does not exist";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/employees";
        }

        employeeRepository.save(employee);
        String successMessage = "Employee updated successfully";
        ra.addFlashAttribute("message", successMessage);

        return "redirect:/employees";

    }

    @GetMapping ("/employees/delete/{id}")
    public String deleteEmployeeById(@PathVariable BigInteger id, RedirectAttributes ra) {
        employeeRepository.deleteById(id);
        String successMessage = "Employee deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/employees";
    }

    @GetMapping("/employees/add-employees-form")
    public ModelAndView addEmployeeForm() {
        Employees employee = new Employees();
        ModelAndView mav = new ModelAndView("employees/add_employee");
        mav.addObject("employee", employee);
        return mav;
    }

    @PostMapping(value="/employees/add-employee")
    public String addEmployee(@Valid @ModelAttribute Employees employee, BindingResult bindingResult, RedirectAttributes ra){

        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/employees";
        }

        if (employee.equals(null)) {
            String errorMessage = "Employee cannot be null";
            ra.addFlashAttribute("message", errorMessage);
            return "redirect:/employees";
        }

        if (employeeRepository.findByEmail(employee.getEmail()) != null) {
            String errorMessage = "Email already taken";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/employees";
        }

        BCryptPasswordEncoder passwordEncoder = new BCryptPasswordEncoder();

        employee.setPassword(passwordEncoder.encode(employee.getPassword()));

        employeeRepository.save(employee);
        String successMessage = "Employee added successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/employees";
    }
}
