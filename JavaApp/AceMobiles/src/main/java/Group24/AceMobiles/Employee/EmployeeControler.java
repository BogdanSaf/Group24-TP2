package Group24.AceMobiles.Employee;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.servlet.ModelAndView;

import java.math.BigInteger;

@Controller
public class EmployeeControler {

    @Autowired
    private EmployeeRepository employeeRepository;

    @GetMapping({"/employees",})
    public ModelAndView getAllUsers() {
        ModelAndView mav = new ModelAndView("employees");
        mav.addObject("employees", employeeRepository.findAll());
        return mav;
    }

    @GetMapping({"/employees/{id}",})
    public ModelAndView getEmployeeById(@PathVariable BigInteger id){
        ModelAndView mav = new ModelAndView("specific_employee");
        mav.addObject("specific_employee", employeeRepository.findById(id).get());
        return mav;
    }
}
