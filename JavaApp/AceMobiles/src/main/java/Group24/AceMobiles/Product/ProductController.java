package Group24.AceMobiles.Product;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindException;
import org.springframework.validation.BindingResult;
import org.springframework.validation.FieldError;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;
import org.springframework.web.servlet.view.RedirectView;

import javax.validation.Valid;
import java.math.BigInteger;

@Controller
@Validated
public class ProductController {
    @Autowired
    private ProductRepository productRepository;


    @GetMapping({"/products",})
    public ModelAndView getAllProducts() {
        ModelAndView mav = new ModelAndView("products");
        mav.addObject("products", productRepository.findAll());
        return mav;
    }

   @GetMapping("/products/show/{id}")
    public ModelAndView getProductById(@PathVariable BigInteger id) {
        ModelAndView mav = new ModelAndView("specific_product");
        mav.addObject("single_product", productRepository.findById(id).get());
        return mav;
    }

    @ExceptionHandler()
    @PostMapping("/products/update/{id}")
    public String updateProductById(@Valid @ModelAttribute Product product,BindingResult bindingResult,RedirectAttributes ra) {
        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/products";
        }

        productRepository.save(product);
        String successMessage = "Product updated successfully";
        ra.addFlashAttribute("message", successMessage);

        return "redirect:/products";

    }
}
