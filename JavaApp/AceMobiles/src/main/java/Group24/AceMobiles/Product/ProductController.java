package Group24.AceMobiles.Product;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.util.StringUtils;
import org.springframework.validation.BindingResult;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.io.IOException;
import java.math.BigInteger;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.Objects;
import java.util.Optional;

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
    public ModelAndView getProductById(@PathVariable BigInteger id, RedirectAttributes ra) {

        if (productRepository.findById(id).isEmpty()) {
            ModelAndView mav = new ModelAndView("redirect:/products");
            ra.addFlashAttribute("errorMessage", "No product found with this id " + id);
            return mav;
        }

        ModelAndView mav = new ModelAndView("product/specific_product");
        mav.addObject("single_product", productRepository.findById(id).get());
        return mav;
    }

    @PostMapping("/products/update/{id}")
    public String updateProductById(@RequestParam("uploadImage") MultipartFile multipartFile, @Valid @ModelAttribute Product product, BindingResult bindingResult, RedirectAttributes ra) throws IOException {
        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/products";
        }

        if (productRepository.findById(product.getProductID()).isEmpty()) {
            String errorMessage = "No product found with this id " + product.getProductID();
            ra.addFlashAttribute("message", errorMessage);
            return "redirect:/products";
        }

        product.setImage(productRepository.findById(product.getProductID()).get().getImage());


        if (!multipartFile.isEmpty()) {

            String fileNames = StringUtils.cleanPath(Objects.requireNonNull(multipartFile.getOriginalFilename()));
            product.setImage(fileNames);

            String fileName = multipartFile.getOriginalFilename();
            Path imagePath = Paths.get("../../AceMobiles/public/images", fileName);
            Path imagePath2 = Paths.get("src/main/LiveStorage/images", fileName);

            try {
                if (!Files.exists(imagePath)) {
                    // Create directories if they don't exist
                    Files.createDirectories(imagePath.getParent());
                    // Save the file to the images directory
                    Files.copy(multipartFile.getInputStream(), imagePath);
                } else {
                    // Overwrite the existing file
                    Files.copy(multipartFile.getInputStream(), imagePath, StandardCopyOption.REPLACE_EXISTING);
                }
            } catch (IOException e) {
                String failMessage = "Image upload failed";
                ra.addFlashAttribute("message", failMessage);
                return "redirect:/products";
            }

            try {
                if (!Files.exists(imagePath2)) {
                    // Create directories if they don't exist
                    Files.createDirectories(imagePath2.getParent());
                    // Save the file to the images directory
                    Files.copy(multipartFile.getInputStream(), imagePath2);
                } else {
                    // Overwrite the existing file
                    Files.copy(multipartFile.getInputStream(), imagePath2, StandardCopyOption.REPLACE_EXISTING);
                }
            } catch (IOException e) {
                String failMessage = "Image upload failed";
                ra.addFlashAttribute("message", failMessage);
                return "redirect:/products";
            }
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

    @PostMapping(value = "/products/add-product")
    public String addProduct(@RequestParam("uploadImage") MultipartFile multipartFile, @Valid @ModelAttribute Product product, BindingResult bindingResult, RedirectAttributes ra) {

        if (bindingResult.hasErrors()) {
            ra.addFlashAttribute("errors", bindingResult);
            return "redirect:/products";
        }

        if (product.equals(null)) {
            String errorMessage = "Product cannot be null";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/products";
        }

        String fileNames = StringUtils.cleanPath(Objects.requireNonNull(multipartFile.getOriginalFilename()));
        product.setImage(fileNames);

        String fileName = multipartFile.getOriginalFilename();
        Path imagePath = Paths.get("src/main/LiveStorage/images", fileName);
        Path imagePath2 = Paths.get("../../AceMobiles/public/images", fileName);

        try {
            if (!Files.exists(imagePath)) {
                // Create directories if they don't exist
                Files.createDirectories(imagePath.getParent());
                // Save the file to the images directory
                Files.copy(multipartFile.getInputStream(), imagePath);
            } else {
                // Overwrite the existing file
                Files.copy(multipartFile.getInputStream(), imagePath, StandardCopyOption.REPLACE_EXISTING);
            }
        } catch (IOException e) {
            String failMessage = "Image upload failed";
            ra.addFlashAttribute("errorMessage", failMessage);
            return "redirect:/products";
        }

        try {
            if (!Files.exists(imagePath2)) {
                // Create directories if they don't exist
                Files.createDirectories(imagePath2.getParent());
                // Save the file to the images directory
                Files.copy(multipartFile.getInputStream(), imagePath2);
            } else {
                // Overwrite the existing file
                Files.copy(multipartFile.getInputStream(), imagePath2, StandardCopyOption.REPLACE_EXISTING);
            }
        } catch (IOException e) {
            String failMessage = "Image upload failed";
            ra.addFlashAttribute("errorMessage", failMessage);
            return "redirect:/products";
        }


        productRepository.save(product);
        String successMessage = "Product added successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/products";
    }

    @GetMapping("/products/delete/{id}")
    public String deleteProductById(@PathVariable BigInteger id, RedirectAttributes ra) {
        Optional<Product> product = productRepository.findById(id);

        if (product.isEmpty()) {
            System.out.println("This true");
            String errorMessage = "No product found with this id " + id;
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/products";
        }

        productRepository.deleteById(id);
        String successMessage = "Product deleted successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/products";
    }

    @GetMapping("/products/order/{id}/{quantity}")
    public String orderProductById(@PathVariable BigInteger id, @PathVariable int quantity, RedirectAttributes ra) {

        if (productRepository.findById(id).isEmpty()) {
            String errorMessage = "Couldnt find the product ";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/products";
        }

        Product product = productRepository.findById(id).get();

        int validStock = product.getProductStock() + quantity;

        if (validStock < 9999) {
            product.setProductStock(validStock);
        } else {
            System.out.println("Product stock for" + product.getProductName() + " exceeds 9999");
            String errorMessage = "Product stock for " + product.getProductName() + " exceeds 9999";
            ra.addFlashAttribute("errorMessage", errorMessage);
            return "redirect:/products";
        }

        productRepository.save(product);
        String successMessage = "Stock ordered successfully";
        ra.addFlashAttribute("message", successMessage);
        return "redirect:/products";
    }
}
