package Group24.AceMobiles;

import Group24.AceMobiles.Product.Product;
import Group24.AceMobiles.Product.ProductController;
import Group24.AceMobiles.Product.ProductRepository;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.http.MediaType;
import org.springframework.mock.web.MockMultipartFile;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.request.MockMvcRequestBuilders;


import org.springframework.validation.BindingResult;

import java.math.BigInteger;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Optional;

import static org.junit.Assert.*;
import static org.junit.runners.model.MultipleFailureException.assertEmpty;
import static org.mockito.ArgumentMatchers.any;
import static org.mockito.BDDMockito.given;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.times;

@RunWith(SpringRunner.class)
@WebMvcTest(ProductController.class)
@AutoConfigureMockMvc(addFilters = false)
public class ProductsControllerTest {

    @Autowired
    private MockMvc mockMvc;

    @MockBean
    @Autowired
    private ProductRepository productRepository;

    @Test
    public void testGetSpecificProductWhenItDoesntExist() throws Exception {
        // Create a new product object
        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("doesntmatter.jpg");

        when(productRepository.findById(product.getProductID())).thenReturn(Optional.empty());

        mockMvc.perform(get("/products/show/" + product.getProductID()))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/products"))
                .andExpect(flash().attributeExists("errorMessage"));

        assertEquals(productRepository.findById(product.getProductID()), Optional.empty());
    }

    @Test
    public void testUpdateProductById() throws Exception {


        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);




        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE,
                "test image".getBytes());

        product.setImage("test.jpg");


        BindingResult bindingResult = mock(BindingResult.class);
        when(bindingResult.hasErrors()).thenReturn(false);


        when(productRepository.findById(product.getProductID())).thenReturn(Optional.of(product));


        mockMvc.perform(MockMvcRequestBuilders.multipart("/products/update/1")
                        .file(multipartFile)
                        .flashAttr("product", product)
                        .flashAttr("bindingResult", bindingResult))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/products"));


        verify(productRepository, times(1)).save(product);


        String expectedPath = "src/main/LiveFolder/images/" + multipartFile.getOriginalFilename();
        Path actualPath = Paths.get(expectedPath);
        assertTrue(Files.exists(actualPath));
    }

    @Test
    public void testAddProduct() throws Exception {

        BindingResult bindingResult = mock(BindingResult.class);
        when(bindingResult.hasErrors()).thenReturn(false);

        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE, "test image".getBytes());

        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("test-image.jpg");

        // Perform a POST request to the controller
        mockMvc.perform(MockMvcRequestBuilders.multipart("/products/add-product")
                .file(multipartFile)
                .flashAttr("product", product))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/products"))
                .andExpect(flash().attributeExists("message"));

        // Assert that the product was saved in the repository
        verify(productRepository, times(1)).save(product);

        String expectedPath = "src/main/LiveFolder/images/" + multipartFile.getOriginalFilename();
        Path actualPath = Paths.get(expectedPath);
        assertTrue(Files.exists(actualPath));
    }


    @Test
    public void testDeleteProductByIdWhenProductDoesntExist() throws Exception {
        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE, "test image".getBytes());

        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("test-image.jpg");


        mockMvc.perform(get("/products/delete/{id}", product.getProductID()))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/products"))
                .andExpect(flash().attributeExists("errorMessage"));

    }

    @Test
    public void testDeleteProductByIdWhenProductExists() throws Exception {
        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE, "test image".getBytes());

        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("test-image.jpg");

        when(productRepository.findById(product.getProductID())).thenReturn(Optional.of(product));

        mockMvc.perform(get("/products/delete/{id}", product.getProductID()))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/products"))
                .andExpect(flash().attributeExists("message"));

        verify(productRepository, times(1)).deleteById(product.getProductID());
    }

    @Test
    public void orderProductById() throws Exception {
        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE, "test image".getBytes());

        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("test-image.jpg");

        when(productRepository.findById(product.getProductID())).thenReturn(Optional.of(product));

        mockMvc.perform(get("/products/order/{id}/{quantity}", product.getProductID(), 1))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/products"))
                .andExpect(flash().attributeExists("message"));

        verify(productRepository, times(1)).save(product);
    }

    @Test
    public void orderProductByIdFails() throws Exception {
        MockMultipartFile multipartFile = new MockMultipartFile("uploadImage", "test.jpg", MediaType.IMAGE_JPEG_VALUE, "test image".getBytes());

        Product product = new Product();
        product.setProductID(BigInteger.valueOf(1));
        product.setProductBrand("Apple");
        product.setProductName("iPhone 11");
        product.setProductDescription("Apple iPhone 11");
        product.setProductPrice(1000);
        product.setProductStock(10);
        product.setImage("test.jpg");

        given(productRepository.findById(product.getProductID())).willReturn(Optional.of(product));

        mockMvc.perform(get("/products/order/{id}/{quantity}", product.getProductID(), 9998))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/products"))
                .andExpect(flash().attributeExists("errorMessage"));
    }




}
