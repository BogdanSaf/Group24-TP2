package Group24.AceMobiles.Product;

import jakarta.persistence.*;
import org.hibernate.validator.constraints.Length;
import org.hibernate.validator.constraints.NotEmpty;

import javax.validation.constraints.*;

import java.math.BigInteger;

@Entity
@Table(name = "products")
public class Product {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "productid")
    private BigInteger productID;

    @NotNull(message = "Product brand cannot be null")
    @NotEmpty(message = "Product brand cannot be empty")
    @Column(name = "productbrand")
    private String productBrand;

    @NotNull(message = "Product name cannot be null")
    @Length(min = 1, max = 10, message = "Product name must be between 1 and 10 characters")
    @Column(name = "productname")
    private String productName;
    @Column(name = "productdescription")
    private String productDescription;

    @Column(name = "productprice")
    private int productPrice;

    @Column(name = "productstock")
    private int productStock;

    @Column(name = "productimage")
    private String productImage;

    public Product() {
    }

    public Product(String productBrand, String productName, String productDescription, int productPrice, int productStock, String image) {
        this.productBrand = productBrand;
        this.productName = productName;
        this.productDescription = productDescription;
        this.productPrice = productPrice;
        this.productStock = productStock;
        this.productImage = image;
    }

    public BigInteger getProductID() {
        return productID;
    }

    public void setProductID(BigInteger productID) {
        this.productID = productID;
    }

    public String getProductBrand() {
        return productBrand;
    }

    public void setProductBrand(String productBrand) {
        this.productBrand = productBrand;
    }

    public String getProductName() {
        return productName;
    }

    public void setProductName(String productName) {
        this.productName = productName;
    }

    public String getProductDescription() {
        return productDescription;
    }

    public void setProductDescription(String productDescription) {
        this.productDescription = productDescription;
    }

    public int getProductPrice() {
        return productPrice;
    }

    public void setProductPrice(int productPrice) {
        this.productPrice = productPrice;
    }

    public int getProductStock() {
        return productStock;
    }

    public void setProductStock(int productStock) {
        this.productStock = productStock;
    }

    public String getImage() {
        return productImage;
    }

    public void setImage(String image) {
        this.productImage = image;
    }


}
