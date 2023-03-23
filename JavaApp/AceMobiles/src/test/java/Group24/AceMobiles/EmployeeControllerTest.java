package Group24.AceMobiles;

import Group24.AceMobiles.Employee.EmployeeControler;

import Group24.AceMobiles.Employee.EmployeeRepository;
import Group24.AceMobiles.Employee.Employees;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.http.MediaType;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.test.web.servlet.request.MockMvcRequestBuilders;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.test.web.servlet.result.MockMvcResultMatchers;


import java.math.BigInteger;

import static org.junit.jupiter.api.Assertions.assertNull;
import static org.mockito.Mockito.*;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@RunWith(SpringRunner.class)
@WebMvcTest(EmployeeControler.class)
@AutoConfigureMockMvc(addFilters = false)
public class EmployeeControllerTest {
    @Autowired
    private MockMvc mockMvc;


    @MockBean
    @Autowired
    private EmployeeRepository employeeRepository;


//    Normal test with no prior users

    @Test
    public void testAddEmployee() throws Exception {
        // Create a new employee object


        Employees employee = new Employees();
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setEmail("johndoe@example.com");
        employee.setPassword("password");

        BCryptPasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        String encodedPassword = passwordEncoder.encode(employee.getPassword());

        when(employeeRepository.findByEmail(anyString())).thenReturn(null);
        when(employeeRepository.save(any(Employees.class))).thenReturn(employee);

        // Perform a post request to the add-employee endpoint
        mockMvc.perform(post("/employees/add-employee")
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", employee.getFirstName())
                        .param("surname", employee.getSurname())
                        .param("email", employee.getEmail())
                        .param("password", employee.getPassword())
                )
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/employees"))
                .andExpect(flash().attributeExists("message"));
    }

//    If employee email is already taken it will return an error
    @Test
    public void testAddEmployeeFailIfEmailTaken() throws Exception {
        // Create a new employee object


        Employees employee = new Employees();
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setEmail("johndoe@example.com");
        employee.setPassword("password");

        BCryptPasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        String encodedPassword = passwordEncoder.encode(employee.getPassword());

        when(employeeRepository.findByEmail(anyString())).thenReturn(employee);

        // Perform a post request to the add-employee endpoint
        mockMvc.perform(post("/employees/add-employee")
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", employee.getFirstName())
                        .param("surname", employee.getSurname())
                        .param("email", employee.getEmail())
                        .param("password", employee.getPassword())
                )
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/employees"))
                .andExpect(flash().attributeExists("errorMessage"));


    }

//    If employee information is missing it will return an error
    @Test
    public void testAddEmployeeFailIfInformationMissing() throws Exception {
        Employees employee = new Employees();
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setPassword("password");

        BCryptPasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        String encodedPassword = passwordEncoder.encode(employee.getPassword());

        when(employeeRepository.findByEmail(anyString())).thenReturn(employee);

        // Perform a post request to the add-employee endpoint
        mockMvc.perform(post("/employees/add-employee")
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", employee.getFirstName())
                        .param("surname", employee.getSurname())
                        .param("email", employee.getEmail())
                        .param("password", employee.getPassword())
                )
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/employees"))
                .andExpect(flash().attributeExists("errors"));


    }

//    Test delete employee by id function
    @Test
    public void testDeleteEmployeeById() throws Exception {
        // Create a new employee object and save it to the repository
        Employees employee = new Employees();
        employee.setEmployeeId(BigInteger.valueOf(1));
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setEmail("johndoe@example.com");
        employee.setPassword("password");
        employeeRepository.save(employee);

        // Perform a get request to the delete-employee endpoint
        mockMvc.perform(get("/employees/delete/" + employee.getEmployeeId()))
                .andExpect(status().is3xxRedirection())
                .andExpect(redirectedUrl("/employees"))
                .andExpect(flash().attributeExists("message"));

        // Verify that the employee was deleted from the repository
        assertNull(employeeRepository.findById(employee.getEmployeeId()).orElse(null));
    }

//    Test fails because employeeRepository.save() randomly does not work. Tried to create a fake database, but it did not work. What I tried (https://stackoverflow.com/questions/59630273/spring-unit-test-repository-save-not-working)
    @Test
    public void updateEmployeeByIdSuccess() throws Exception {
        Employees employee = new Employees();
        employee.setEmployeeId(BigInteger.valueOf(1));
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setEmail("fake@gmail.com");
        employee.setPassword("password");



        System.out.println(employeeRepository.findById(employee.getEmployeeId()).isPresent());
        employeeRepository.save(employee);
        mockMvc.perform(post("/employees/update/" + employee.getEmployeeId())
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", employee.getFirstName())
                        .param("surname", employee.getSurname())
                        .param("email", employee.getEmail())
                        .param("password", employee.getPassword())
                ).andExpect(MockMvcResultMatchers.redirectedUrl("/employees"))
                .andExpect(MockMvcResultMatchers.flash().attributeExists("errorMessage"));

        verify(employeeRepository).save(employee);
    }

    @Test
    public void updateEmployeeByIdFail() throws Exception {
        Employees employee = new Employees();
        employee.setEmployeeId(BigInteger.valueOf(3));
        employee.setFirstName("John");
        employee.setSurname("Doe");
        employee.setEmail("fake@gmail.com");
        employee.setPassword("password");


        mockMvc.perform(post("/employees/update/" + employee.getEmployeeId())
                        .contentType(MediaType.APPLICATION_FORM_URLENCODED)
                        .param("firstName", employee.getFirstName())
                        .param("surname", employee.getSurname())
                        .param("email", employee.getEmail())
                        .param("password", employee.getPassword())
                ).andExpect(MockMvcResultMatchers.redirectedUrl("/employees"))
                .andExpect(MockMvcResultMatchers.flash().attributeExists("errorMessage"));

    }
}




