package Group24.AceMobiles.Product;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;

import java.math.BigInteger;

@Controller
public class ProductController {
    @Autowired
    private ProductRepository productRepository;


    @GetMapping({"/products",})
    public ModelAndView getAllProducts() {
        ModelAndView mav = new ModelAndView("products");
        mav.addObject("products", productRepository.findAll());
        return mav;
    }

   @GetMapping("/products/{id}")
    public ModelAndView getProductById(@PathVariable BigInteger id) {
        ModelAndView mav = new ModelAndView("specific_product");
        mav.addObject("single_product", productRepository.findById(id).get());
        return mav;
    }
}
