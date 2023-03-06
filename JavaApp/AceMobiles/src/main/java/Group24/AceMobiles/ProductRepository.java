package Group24.AceMobiles;

import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

@Repository
public interface ProductRepository extends JpaRepository<Product, Integer> {
    @Override
    Optional<Product> findById(Integer integer);

    @Override
    List<Product> findAll();

    @Override
    void deleteById(Integer integer);
}
