@last_seen_products
Feature: Showing last seen products on customer show page
    In order to be aware about interests of the Customer
    As an Administrator
    I want to see last seen products on Customer show page

    Background:
        Given the store has customer "Jon Snow" with email "winteriscoming@westeros.com"
        And the store has a product "The Wall"
        And the store has a product "Playstation 4 PRO"
        And the store has a product "Pablo Escobar T-Shirt"
        And customer "Jon Snow" visited pages of products "The Wall" and "Playstation 4 PRO"
        And I am logged in as an administrator

    @ui
    Scenario: Seeing 2 last seen products on customer show page
        When I view details of the customer "winteriscoming@westeros.com"
        Then I should see 2 last seen products
        And I should see "The Wall" product
        And I should see "Playstation 4 PRO" product
        But I should not see "Pablo Escobar T-Shirt" product
