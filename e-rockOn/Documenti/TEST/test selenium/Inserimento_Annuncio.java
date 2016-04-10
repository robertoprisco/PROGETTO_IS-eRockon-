package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class InserimentoAnnuncio {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost/~Luigi/e-rockon/index.php";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testInserimentoAnnuncio() throws Exception {
    driver.get(baseUrl + "/~Luigi/e-rockon/annuncio.php");
    driver.findElement(By.name("nome")).clear();
    driver.findElement(By.name("nome")).sendKeys("Fender");
    driver.findElement(By.name("tipo")).clear();
    driver.findElement(By.name("tipo")).sendKeys("Chitarra");
    driver.findElement(By.name("descrizione")).clear();
    driver.findElement(By.name("descrizione")).sendKeys("Fender Stratocaster d'epoca");
    driver.findElement(By.name("city")).clear();
    driver.findElement(By.name("city")).sendKeys("Napoli");
    new Select(driver.findElement(By.name("provincia"))).selectByVisibleText("Napoli");
    driver.findElement(By.id("inputImg")).clear();
    driver.findElement(By.id("inputImg")).sendKeys("C:\\Users\\pc\\Desktop\\pietrosmusi.png");
    driver.findElement(By.cssSelector("button.btn.btn-success")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
