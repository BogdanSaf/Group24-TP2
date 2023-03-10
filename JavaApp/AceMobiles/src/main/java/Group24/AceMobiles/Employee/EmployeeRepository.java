package Group24.AceMobiles.Employee;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.math.BigInteger;
import java.util.List;
import java.util.Optional;

@Repository
public interface EmployeeRepository extends JpaRepository<Employees, BigInteger> {

    @Override
    Optional<Employees> findById(BigInteger integer);

    @Override
    List<Employees> findAll();

    @Override
    void deleteById(BigInteger integer);
}
