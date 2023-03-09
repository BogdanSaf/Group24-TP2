package Group24.AceMobiles.Employee;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

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
}
