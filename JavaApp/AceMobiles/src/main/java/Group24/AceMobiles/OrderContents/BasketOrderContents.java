package Group24.AceMobiles.OrderContents;

import Group24.AceMobiles.Orders.Orders;
import Group24.AceMobiles.Product.Product;
import jakarta.persistence.*;

import java.math.BigInteger;

@Entity
@Table(name = "basket_order_contents")
public class BasketOrderContents {

    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Id
    @Column(name = "basketcontentid")
    private BigInteger basketOrderContentsId;

    @ManyToOne(targetEntity = Orders.class,fetch = FetchType.LAZY)
    @JoinColumn(name = "orderidfk", referencedColumnName = "orderid")
    private Orders orderIdfk;

    @ManyToOne(targetEntity = Product.class,fetch = FetchType.LAZY)
    @JoinColumn(name = "productidfk", referencedColumnName = "productid")
    private Product productIdfk;

    @Column(name = "quantity")
    private int quantity;

    public BasketOrderContents() {
    }

    public BigInteger getBasketOrderContentsId() {
        return basketOrderContentsId;
    }

    public void setBasketOrderContentsId(BigInteger basketOrderContentsId) {
        this.basketOrderContentsId = basketOrderContentsId;
    }

    public Orders getOrderIdfk() {
        return orderIdfk;
    }

    public void setOrderIdfk(Orders orderIdfk) {
        this.orderIdfk = orderIdfk;
    }

    public Product getProductIdfk() {
        return productIdfk;
    }

    public void setProductIdfk(Product productIdfk) {
        this.productIdfk = productIdfk;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }
}
