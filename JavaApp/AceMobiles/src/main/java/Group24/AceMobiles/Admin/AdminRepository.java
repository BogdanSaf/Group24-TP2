package Group24.AceMobiles.Admin;

import Group24.AceMobiles.Product.Product;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface AdminRepository extends JpaRepository<Admin, Integer> {
    @Query("SELECT u FROM Admin u WHERE u.email = ?1")
    public Admin findByEmail(String email);
}
