package Group24.AceMobiles.Users;

import jakarta.persistence.*;
import org.hibernate.validator.constraints.Email;
import org.hibernate.validator.constraints.Length;
import org.hibernate.validator.constraints.NotBlank;
import org.hibernate.validator.constraints.NotEmpty;

import javax.validation.constraints.*;

import java.math.BigInteger;

@Entity
@Table(name = "users")
public class Users {
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Id
    @Column(name = "userID")
    private BigInteger userId;
    @Basic
    @Length(min = 1, max = 50, message = "First name must be between 1 and 50 characters")
    @Column(name = "firstname")
    private String firstName;
    @Basic
    @Length(min = 1, max = 50, message = "Surname must be between 1 and 50 characters")
    @Column(name = "surname")
    private String surname;
    @Basic
    @Length(min = 1, max = 100, message = "Address must be between 1 and 100 characters")
    @Column(name = "address")
    private String address;
    @Basic
    @Length(min = 1, max = 8, message = "Postcode must be between 1 and 8 characters")
    @Column(name = "postcode")
    private String postcode;
    @Basic
    @Size(min = 11, max = 11, message = "Phone number must be 11 digits")
    @Column(name = "phonenumber")
    private int phoneNumber;
    @Basic
    @Email(message = "Email must be valid")
    @Column(name = "email" , unique = true)
    private String email;
    @Basic
    @NotEmpty(message = "Password must not be empty")
    @Column(name = "password")
    private String password;

    public Users(String firstName, String surname, String address, String postcode, int phoneNumber, String email, String password) {
        this.firstName = firstName;
        this.surname = surname;
        this.address = address;
        this.postcode = postcode;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.password = password;
    }

    public Users() {

    }

    public BigInteger getUserId() {
        return userId;
    }

    public void setUserId(BigInteger userId) {
        this.userId = userId;
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

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getPostcode() {
        return postcode;
    }

    public void setPostcode(String postcode) {
        this.postcode = postcode;
    }

    public int getPhoneNumber() {
        return phoneNumber;
    }

    public void setPhoneNumber(int phoneNumber) {
        this.phoneNumber = phoneNumber;
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
