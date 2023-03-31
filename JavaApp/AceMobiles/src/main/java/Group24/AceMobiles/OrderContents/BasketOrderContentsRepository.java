package Group24.AceMobiles.OrderContents;

import Group24.AceMobiles.OrderContents.BasketOrderContents;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.transaction.annotation.Transactional;

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

        @Query(value = "SELECT * FROM basket_order_contents  WHERE orderidfk = :id", nativeQuery = true)
        List<BasketOrderContents> findByOrderId(@Param("id") BigInteger orderIDFK);

        @Query(value = "SELECT * FROM basket_order_contents  WHERE productidfk = :productid", nativeQuery = true)
        List<BasketOrderContents> findByProductID(@Param("productid") BigInteger productIDFK);

        @Transactional
        @Modifying
        @Query(value = "DELETE FROM basket_order_contents  WHERE orderidfk = :id AND productidfk = :productid", nativeQuery = true)
        void deleteByOrderAndProductID(@Param("id") BigInteger orderIDFK, @Param("productid") BigInteger productIDFK);

        @Transactional
        @Modifying
        @Query(value = "DELETE FROM basket_order_contents  WHERE orderidfk = :id", nativeQuery = true)
        void deleteByOrderID(@Param("id") BigInteger orderIDFK);


}
