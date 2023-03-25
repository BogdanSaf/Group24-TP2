package Group24.AceMobiles.Product;

import jakarta.annotation.Nullable;
import jakarta.persistence.*;
import org.hibernate.validator.constraints.Length;
import org.hibernate.validator.constraints.NotEmpty;

import javax.validation.constraints.*;

import java.math.BigInteger;

@Entity
@Table(name = "products")
public class Product {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "productid")
    private BigInteger productID;

    @NotEmpty(message = "Product brand cannot be empty")
    @Column(name = "productbrand")
    private String productBrand;

    @NotNull(message = "Product name cannot be null")
    @Length(min = 1, max = 50, message = "Product name must be between 1 and 10 characters")
    @Column(name = "productname")
    private String productName;

    @NotNull(message = "Product description cannot be null")
    @Length(min = 1, max = 255, message = "Product description must be between 1 and 100 characters")
    @Column(name = "productdescription")
    private String productDescription;

    @NotNull(message = "Product price cannot be null")
    @Min(value = 1, message = "Product price must be greater than 0")
    @Column(name = "productprice")
    private int productPrice;

    @NotNull(message = "Product stock cannot be null")
    @Min(value = 1, message = "Product stock must be greater than 0")
    @Max(value = 9999, message = "Product stock must be less than 9999")
    @Column(name = "productstock")
    private int productStock;

    @NotNull(message = "Product image cannot be null")
    @Column(name = "productimage")
    private String productImage;

    @Nullable
    @Column(name = "productsold")
    private int productSold;

    public Product() {
    }

    public Product(String productBrand, String productName, String productDescription, int productPrice, int productStock, String image, int productSold) {
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

    public int getProductSold() {
        return productSold;
    }

    public void setProductSold(int productSold) {
        this.productSold = productSold;
    }


}
