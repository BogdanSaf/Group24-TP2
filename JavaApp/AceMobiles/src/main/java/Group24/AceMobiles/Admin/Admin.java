package Group24.AceMobiles.Admin;

import jakarta.persistence.*;
import java.math.BigInteger;

@Entity
@Table(name = "admins")
public class Admin {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "adminid", nullable = false)
    private BigInteger adminID;

    @Column(name = "firstname", nullable = false)
    private String firstName;

    @Column(name = "surname", nullable = false)
    private String surname;

    @Column(name = "email", nullable = false)
    private String email;

    @Column(name = "password", nullable = false)
    private String password;

    public Admin() {
    }

    public Admin(BigInteger adminID, String firstName, String surname, String email, String password) {
        this.adminID = adminID;
        this.firstName = firstName;
        this.surname = surname;
        this.email = email;
        this.password = password;
    }

    public BigInteger getAdminID() {
        return adminID;
    }

    public String getFirstName() {
        return firstName;
    }

    public String getSurname() {
        return surname;
    }

    public String getEmail() {
        return email;
    }

    public String getPassword() {
        return password;
    }
}
