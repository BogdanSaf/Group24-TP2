package Group24.AceMobiles.User;

import Group24.AceMobiles.Product.Product;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;


@Repository
public interface UserRepository extends JpaRepository<User, BigInteger> {

    @Override
    Optional<User> findById(BigInteger integer);

    @Override
    List<User> findAll();

    @Override
    void deleteById(BigInteger integer);
}
