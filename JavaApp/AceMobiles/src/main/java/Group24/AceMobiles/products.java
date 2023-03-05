package Group24.AceMobiles;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

import java.math.BigInteger;

@Entity
public class products {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private BigInteger productID;
    private String productBrand;

    private String productName;
    private String productDescription;
    private int productPrice;

    private int productStock;
    private String productImage;

    public products() {
    }

    public products(BigInteger productID, String productBrand, String productName, String productDescription, int productPrice, int productStock, String image) {
        this.productID = productID;
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
