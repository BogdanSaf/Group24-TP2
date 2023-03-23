package Group24.AceMobiles.Users;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;


@Repository
public interface UserRepository extends JpaRepository<Users, BigInteger> {

    @Override
    Optional<Users> findById(BigInteger integer);

    @Override
    List<Users> findAll();

    @Override
    void deleteById(BigInteger integer);

    @Override
    Users save(Users users);


    @Query(value = "SELECT * FROM users WHERE email = :email", nativeQuery = true)
    Users findByEmail(@Param("email") String email);

}
