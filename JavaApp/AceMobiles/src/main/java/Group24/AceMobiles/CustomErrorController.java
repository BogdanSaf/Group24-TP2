package Group24.AceMobiles;

import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.http.HttpServletRequest;

import org.springframework.boot.web.servlet.error.ErrorController;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class CustomErrorController implements ErrorController {

    @GetMapping ("/error")
    public ModelAndView handleError(HttpServletRequest request) {

        Object status = request.getAttribute(RequestDispatcher.ERROR_STATUS_CODE);

        ModelAndView mav = new ModelAndView("error");

        Integer statusCode = Integer.valueOf(status.toString());

        String error = statusCode.toString();

        if (error.isEmpty()){
            error = "Unknown Error";
        }

        mav.addObject("error", error);
        return mav;
    }

}
