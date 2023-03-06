package Group24.AceMobiles;

import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

@Repository
public interface ProductRepository extends JpaRepository<products, Integer> {
    @Override
    Optional<products> findById(Integer integer);

    @Override
    List<products> findAll();

    @Override
    void deleteById(Integer integer);
}
