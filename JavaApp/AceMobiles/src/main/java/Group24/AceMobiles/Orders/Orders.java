package Group24.AceMobiles.Orders;

import Group24.AceMobiles.Users.Users;
import jakarta.persistence.*;

import java.math.BigInteger;
import java.sql.Date;
import java.util.Objects;

@Entity
@Table(name = "orders")
public class Orders {
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "orderid")
    private BigInteger orderId;

    @ManyToOne(targetEntity = Users.class,fetch = FetchType.LAZY)
    @JoinColumn(name = "useridfk", referencedColumnName = "userID")
    private Users usersIdfk;
    @Basic
    @Column(name = "orderdate")
    private Date orderDate;
    @Basic
    @Column(name = "arrivaldate")
    private Date arrivalDate;
    @Basic
    @Column(name = "status")
    private String status;


    public Orders() {
    }

    public Orders(BigInteger User, Date orderDate, Date arrivalDate, String status) {
        this.usersIdfk = usersIdfk;
        this.orderDate = orderDate;
        this.arrivalDate = arrivalDate;
        this.status = status;
    }

    public BigInteger getOrderId() {
        return orderId;
    }

    public Users getUserIdfk() {
        return usersIdfk;
    }

    public void setUserIdfk(Users usersIdfk) {
        this.usersIdfk = usersIdfk;
    }

    public Date getOrderDate() {
        return orderDate;
    }

    public void setOrderDate(Date orderDate) {
        this.orderDate = orderDate;
    }

    public Date getArrivalDate() {
        return arrivalDate;
    }

    public void setArrivalDate(Date arrivalDate) {
        this.arrivalDate = arrivalDate;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Orders orders = (Orders) o;
        return orderId == orders.orderId && usersIdfk == orders.usersIdfk && Objects.equals(orderDate, orders.orderDate) && Objects.equals(arrivalDate, orders.arrivalDate) && Objects.equals(status, orders.status);
    }

    @Override
    public int hashCode() {
        return Objects.hash(orderId, usersIdfk, orderDate, arrivalDate, status);
    }
}
