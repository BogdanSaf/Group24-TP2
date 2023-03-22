package Group24.AceMobiles;

import Group24.AceMobiles.Product.ProductController;
import Group24.AceMobiles.Product.ProductRepository;
import Group24.AceMobiles.Users.UserController;
import Group24.AceMobiles.Users.UserRepository;
import Group24.AceMobiles.Users.Users;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.http.MediaType;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.request.MockMvcRequestBuilders;
import org.springframework.validation.BindingResult;

import java.math.BigInteger;
import java.util.Objects;
import java.util.Optional;

import static org.junit.Assert.*;
import static org.mockito.ArgumentMatchers.any;

import static org.mockito.Mockito.mock;
import static org.mockito.BDDMockito.given;
import static org.mockito.Mockito.when;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;
import static org.mockito.Mockito.verify;
import static org.mockito.Mockito.times;

@RunWith(SpringRunner.class)
@WebMvcTest(UserController.class)
@AutoConfigureMockMvc(addFilters = false)
public class UserControllerTest {

    @Autowired
    private MockMvc mockMvc;

    @MockBean
    @Autowired
    private UserRepository userRepository;

    @MockBean
    @Autowired
    private ProductRepository productRepository;

//    If you do verify(userRepository, times(1)).save(user); it will fail because the object will be changed from encrypting the password
//    Tried to use BCryptPasswordEncoder and alter the userIdfk after mockMvc, but it didn't work
    @Test
    public void addUserTest() throws Exception {

        Users userIdfk = new Users();
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("Suck");
        userIdfk.setSurname("It");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("123456789");
        userIdfk.setPassword("123456789");


        mockMvc.perform(post("/add-user")
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", userIdfk.getFirstName())
                        .param("surname", userIdfk.getSurname())
                        .param("address", userIdfk.getAddress())
                        .param("postcode", userIdfk.getPostcode())
                        .param("phoneNumber", userIdfk.getPhoneNumber())
                        .param("email", userIdfk.getEmail())
                        .param("password", userIdfk.getPassword()))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/"));
    }


    @Test
    public void addUserTestFail() throws Exception {

        Users userIdfk = new Users();
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("");
        userIdfk.setSurname("");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("123456789");
        userIdfk.setPassword("123456789");


        mockMvc.perform(post("/add-user")
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", userIdfk.getFirstName())
                        .param("surname", userIdfk.getSurname())
                        .param("address", userIdfk.getAddress())
                        .param("postcode", userIdfk.getPostcode())
                        .param("phoneNumber", userIdfk.getPhoneNumber())
                        .param("email", userIdfk.getEmail())
                        .param("password", userIdfk.getPassword()))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/"));
    }

    @Test
    public void deleteUserTest() throws Exception {
        Users userIdfk = new Users();
        userIdfk.setUserId(BigInteger.valueOf(1));
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("Suck");
        userIdfk.setSurname("It");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("123456789");
        userIdfk.setPassword("123456789");

        when(userRepository.findById(userIdfk.getUserId())).thenReturn(java.util.Optional.of(userIdfk));

        mockMvc.perform(get("/delete/" + userIdfk.getUserId()))
                .andExpect(status().is3xxRedirection())
                .andExpect(flash().attributeExists("message"))
                .andExpect(redirectedUrl("/"));

        verify(userRepository, times(1)).deleteById(userIdfk.getUserId());
    }

    @Test
    public void deleteUserTestWhenUserDoesntExist() throws Exception {
        Users userIdfk = new Users();
        userIdfk.setUserId(BigInteger.valueOf(1));
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("Suck");
        userIdfk.setSurname("It");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("123456789");
        userIdfk.setPassword("123456789");

        mockMvc.perform(get("/delete/" + userIdfk.getUserId()))
                .andExpect(status().is3xxRedirection())
                .andExpect(flash().attributeExists("errorMessage"))
                .andExpect(redirectedUrl("/"));
    }


    @Test
    public void testUpdateUserByIdWhereUserDoesntExist() throws Exception {
        Users userIdfk = new Users();
        userIdfk.setUserId(BigInteger.valueOf(1));
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("Suck");
        userIdfk.setSurname("It");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("12345678901");
        userIdfk.setPassword("123456789");

        mockMvc.perform(post("/update/"+ userIdfk.getUserId())
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", userIdfk.getFirstName())
                        .param("surname", userIdfk.getSurname())
                        .param("address", userIdfk.getAddress())
                        .param("postcode", userIdfk.getPostcode())
                        .param("phoneNumber", userIdfk.getPhoneNumber())
                        .param("email", userIdfk.getEmail())
                        .param("password", userIdfk.getPassword()))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/"))
                .andExpect(flash().attributeExists("errorMessage"));


    }

}
