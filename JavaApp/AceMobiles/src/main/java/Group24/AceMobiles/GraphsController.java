package Group24.AceMobiles;

import Group24.AceMobiles.Product.Product;
import Group24.AceMobiles.Product.ProductRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

import java.util.ArrayList;
import java.util.List;

@Controller
public class GraphsController {

    @Autowired
    private ProductRepository productRepository;
    @GetMapping("/graphs")
    public ModelAndView getGraphs() {
        ModelAndView mav = new ModelAndView("Graphs");

        ArrayList<String> productNames = new ArrayList<String>();
        ArrayList<Integer> productPrices = new ArrayList<Integer>();
        ArrayList<Integer> productStocks = new ArrayList<Integer>();
        ArrayList<String> randomColours = new ArrayList<String>();

        List<Product> products = productRepository.findAll();

        for (Product product : products) {
            productNames.add(product.getProductName());
            productPrices.add(product.getProductPrice());
            productStocks.add(product.getProductStock());
            randomColours.add("rgb(" + (int) (Math.random() * 255) + "," + (int) (Math.random() * 255) + "," + (int) (Math.random() * 255) + ")");
        }
        mav.addObject("productNames", productNames);
        mav.addObject("productPrices", productPrices);
        mav.addObject("productStocks", productStocks);
        mav.addObject("randomColours", randomColours);
        return mav;
    }
}
