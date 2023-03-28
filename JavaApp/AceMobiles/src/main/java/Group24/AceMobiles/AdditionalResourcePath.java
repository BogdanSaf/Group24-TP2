package Group24.AceMobiles;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

@Configuration
public class AdditionalResourcePath implements WebMvcConfigurer {

    public void AdditionalResourceWebConfiguration() {
        System.out.println("AdditionalResourceWebConfiguration constructor called");
    }
    @Override
    public void addResourceHandlers(ResourceHandlerRegistry registry) {
        registry.addResourceHandler("/live/**")
                .addResourceLocations("file:///" + System.getProperty("user.dir") +  "/src/main/LiveFolder/");
    }
}
