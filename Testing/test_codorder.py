# Generated by Selenium IDE
import pytest
import time
import json
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities

class TestCodorder():
  def setup_method(self, method):
    self.driver = webdriver.Chrome()
    self.vars = {}
  
  def teardown_method(self, method):
    self.driver.quit()
  
  def test_codorder(self):
    self.driver.get("http://localhost:8004/index.php")
    self.driver.set_window_size(900, 816)
    self.driver.find_element(By.LINK_TEXT, "Order Now").click()
    self.driver.find_element(By.ID, "username").send_keys("shruti@123")
    self.driver.find_element(By.ID, "password").send_keys("1234")
    self.driver.find_element(By.NAME, "submit").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(1) > .col-md-3:nth-child(3) .btn").click()
    self.driver.find_element(By.LINK_TEXT, "order now.").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(1) > .col-md-3:nth-child(4) .btn").click()
    self.driver.find_element(By.CSS_SELECTOR, ".btn-success").click()
    self.driver.find_element(By.CSS_SELECTOR, "a:nth-child(3) > .btn").click()
    self.driver.find_element(By.CSS_SELECTOR, ".glyphicon-log-out").click()
    self.driver.find_element(By.ID, "username").send_keys("shruti@123")
    self.driver.find_element(By.ID, "password").send_keys("1234")
    self.driver.find_element(By.LINK_TEXT, "Home").click()
  
