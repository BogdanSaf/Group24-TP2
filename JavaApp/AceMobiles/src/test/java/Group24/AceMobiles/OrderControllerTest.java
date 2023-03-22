package Group24.AceMobiles;


import Group24.AceMobiles.OrderContents.BasketOrderContents;
import Group24.AceMobiles.OrderContents.BasketOrderContentsRepository;
import Group24.AceMobiles.Orders.Orders;
import Group24.AceMobiles.Orders.OrderController;
import Group24.AceMobiles.Orders.OrderRepository;
import Group24.AceMobiles.Product.Product;
import Group24.AceMobiles.Users.UserRepository;
import Group24.AceMobiles.Users.Users;
import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.MockitoAnnotations;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.result.MockMvcResultMatchers;



import java.math.BigInteger;
import java.sql.Date;
import java.util.Optional;

import static org.mockito.BDDMockito.given;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@RunWith(SpringRunner.class)
@WebMvcTest(OrderController.class)
@AutoConfigureMockMvc(addFilters = false)
public class OrderControllerTest {
    @Autowired
    private MockMvc mockMvc;

    @MockBean
    @Autowired
    private OrderRepository orderRepository;

    @MockBean
    @Autowired
    private BasketOrderContentsRepository basketOrderContentsRepository;

    @MockBean
    @Autowired
    private UserRepository usersRepository;

    @Before
    public void start(){
        MockitoAnnotations.initMocks(this);
    }

    @Test
    public void testDeleteOrederById() throws Exception {
        // Create a new employee object and save it to the repository
        Orders order = new Orders();
        order.setOrderId(BigInteger.valueOf(1));
        order.setUserIdfk(new Users());
        order.setOrderDate(Date.valueOf("2020-01-01"));
        order.setStatus("pending");
        order.setArrivalDate(Date.valueOf("2020-01-08"));

        BasketOrderContents bs = new BasketOrderContents();
        bs.setOrderIdfk(order);
        bs.setProductIdfk(new Product());
        bs.setQuantity(1);

        given(orderRepository.findById(order.getOrderId())).willReturn(Optional.of(order));
        given(basketOrderContentsRepository.findByOrderId(order.getOrderId())).willReturn(Optional.of((bs)));

        // Perform a get request to the delete-employee endpoint
        mockMvc.perform(get("/orders/delete/" + order.getOrderId()))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/orders"))
                .andExpect(flash().attributeExists("message"))
                .andExpect(flash().attribute("message", "Order deleted successfully"));

        // Verify that the employee was deleted from the repository

    }

    @Test
    public void testGetOrderById() throws Exception {
        Orders order = new Orders();
        order.setOrderId(BigInteger.valueOf(1));
        order.setOrderDate(Date.valueOf("2020-01-01"));
        order.setArrivalDate(Date.valueOf("2020-01-08"));
        order.setStatus("pending");

        Users userIdfk = new Users();
        userIdfk.setEmail("suckIt@gmail.com");
        userIdfk.setFirstName("Suck");
        userIdfk.setSurname("It");
        userIdfk.setAddress("123 suck it street");
        userIdfk.setPostcode("1234");
        userIdfk.setPhoneNumber("123456789");
        userIdfk.setPassword("123456789");
        order.setUserIdfk(userIdfk);



        given(orderRepository.findById(order.getOrderId())).willReturn(Optional.of(order));

        mockMvc.perform(get("/orders/show/" + order.getOrderId()))
                .andExpect(MockMvcResultMatchers.view().name("orders/specific_order"))
                .andExpect(MockMvcResultMatchers.model().attributeExists("minDate"))
                .andExpect(MockMvcResultMatchers.model().attributeExists("order"))
                .andReturn()
                .getModelAndView();
    }

    @Test
    public void testViewItemsWhenBasketContentsDoesntExist() throws Exception {
        Orders order = new Orders();
        order.setOrderId(BigInteger.valueOf(1));
        order.setOrderDate(Date.valueOf("2020-01-01"));
        order.setArrivalDate(Date.valueOf("2020-01-08"));
        order.setStatus("pending");

        given(orderRepository.findById(order.getOrderId())).willReturn(Optional.of(order));
        given(basketOrderContentsRepository.findByOrderId(order.getOrderId())).willReturn(Optional.empty());

        mockMvc.perform(get("/orders/viewItems/" + order.getOrderId()))
                .andExpect(status().is3xxRedirection())
                .andExpect(view().name("redirect:/orders"))
                .andExpect(flash().attributeExists("message"))
                .andReturn()
                .getModelAndView();
    }

}
