package Group24.AceMobiles.Product;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;

@Repository
public interface ProductRepository extends JpaRepository<Product, BigInteger> {
    @Override
    Optional<Product> findById(BigInteger integer);

    @Override
    List<Product> findAll();

    @Override
    void deleteById(BigInteger integer);

    @Override
    Product save(Product product);

    @Query(value = "SELECT * FROM products WHERE productname = :name", nativeQuery = true)
    Product findByName(@Param("name") String name);

}
