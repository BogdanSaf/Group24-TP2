package Group24.AceMobiles.Product;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.math.BigInteger;

@Controller
@Validated
public class ProductController {
    @Autowired
    private ProductRepository productRepository;


    @GetMapping({"/products",})
    public ModelAndView getAllProducts() {
        ModelAndView mav = new ModelAndView("product/products");
        mav.addObject("products", productRepository.findAll());
        return mav;
    }

   @GetMapping("/products/show/{id}")
    public ModelAndView getProductById(@PathVariable BigInteger id) {
        ModelAndView mav = new ModelAndView("product/specific_product");
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

    @GetMapping("/products/add-product-form")
    public ModelAndView addProductForm() {
        Product product = new Product();
        ModelAndView mav = new ModelAndView("product/add_products");
        mav.addObject("add_product", product);
        return mav;
    }

    @PostMapping(value="/products/add-product")
    public String addProduct(@Valid @ModelAttribute Product product, BindingResult bindingResult, RedirectAttributes ra){

        System.out.println("Product brand is: " + product.getProductBrand());
        System.out.println("Product name is: " + product.getProductName());

        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/products";
        }

        if (product.equals(null)) {
            String errorMessage = "Product cannot be null";
            ra.addFlashAttribute("message", errorMessage);
            return "redirect:/products";
        }

        productRepository.save(product);
        String successMessage = "Product added successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/products";
    }

    @GetMapping ("/products/delete/{id}")
    public String deleteProductById(@PathVariable BigInteger id, RedirectAttributes ra) {
        productRepository.deleteById(id);
        String successMessage = "Product deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/products";
    }
}
