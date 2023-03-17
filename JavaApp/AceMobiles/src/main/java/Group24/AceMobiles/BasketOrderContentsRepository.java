package Group24.AceMobiles;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;

public interface BasketOrderContentsRepository extends JpaRepository<BasketOrderContents, BigInteger> {

        @Override
        Optional<BasketOrderContents> findById(BigInteger id);

        @Override
        List<BasketOrderContents> findAll();

        @Override
        void deleteById(BigInteger id);

        @Query(value = "SELECT * FROM basket_order_contents WHERE orderIDFK = ?1", nativeQuery = true)
        List<BasketOrderContents> findByOrderId(BigInteger orderId);
}
