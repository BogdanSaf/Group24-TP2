package Group24.AceMobiles.Employee;

import jakarta.persistence.*;
import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.Length;
import org.hibernate.validator.constraints.NotEmpty;

import javax.validation.constraints.*;

import java.math.BigInteger;

@Entity
@Table(name = "employees")
public class Employees {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "employeeid")
    private BigInteger employeeId;

    @Length(min = 1, max = 50, message = "First name must be between 1 and 50 characters")
    @NotEmpty(message = "First name must not be empty")
    @Column(name = "firstname")
    private String firstName;

    @Length(min = 1, max = 50, message = "Surname must be between 1 and 50 characters")
    @NotEmpty(message = "Surname must not be empty")
    @Column(name = "surname")
    private String surname;

    @Email(message = "Email must be valid")
    @NotEmpty(message = "Email must not be empty")
    @Column(name = "email", unique = true)
    private String email;

    @Column(name = "password")
    @NotEmpty(message = "Password must not be empty")
    private String password;

    public Employees(String firstName, String surname, String email, String password) {
        this.firstName = firstName;
        this.surname = surname;
        this.email = email;
        this.password = password;
    }

    public Employees() {
    }

    public BigInteger getEmployeeId() {
        return employeeId;
    }

    public void setEmployeeId(BigInteger employeeId) {
        this.employeeId = employeeId;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
