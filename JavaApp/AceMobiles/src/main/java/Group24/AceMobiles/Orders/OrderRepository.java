package Group24.AceMobiles.Orders;

import Group24.AceMobiles.Users.Users;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;

public interface OrderRepository extends JpaRepository<Orders, BigInteger>{

    @Override
    Optional<Orders> findById(BigInteger integer);

    @Override
    List<Orders> findAll();

    @Override
    void deleteById(BigInteger integer);

}
