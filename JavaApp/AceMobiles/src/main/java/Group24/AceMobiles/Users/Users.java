package Group24.AceMobiles.Users;

import jakarta.persistence.*;
import java.math.BigInteger;

import java.util.Objects;

@Entity
@Table(name = "users")
public class Users {
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "userID")
    private BigInteger userId;
    @Basic
    @Column(name = "firstname")
    private String firstName;
    @Basic
    @Column(name = "surname")
    private String surname;
    @Basic
    @Column(name = "address")
    private String address;
    @Basic
    @Column(name = "postcode")
    private String postcode;
    @Basic
    @Column(name = "phonenumber")
    private int phoneNumber;
    @Basic
    @Column(name = "email" , unique = true)
    private String email;
    @Basic
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

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Users that = (Users) o;
        return userId == that.userId && phoneNumber == that.phoneNumber && Objects.equals(firstName, that.firstName) && Objects.equals(surname, that.surname) && Objects.equals(address, that.address) && Objects.equals(postcode, that.postcode) && Objects.equals(email, that.email) && Objects.equals(password, that.password);
    }

    @Override
    public int hashCode() {
        return Objects.hash(userId, firstName, surname, address, postcode, phoneNumber, email, password);
    }
}
