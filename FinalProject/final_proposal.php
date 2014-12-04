<h4> <strong> Aneesha Gupta Final Project Proposal: <br></strong>  </h4>

<strong> Topic: </strong> Fitting men and women with sunglasses that are amenable to their face shape and current trends. <br>
<strong>Scope: </strong> Users will upload a photo of their face and there will be an algorithm that will use such dimensions to match them with certain sunglasses.  To achieve this, the website will start out by asking their gender, and give them an option to take a photo or upload one.  Then, the website will ask the user to trace the outline of their face, the face dimension algorithm will take place, and then there will be a page where users can go through their sunglasses options.<br>
<strong> Audience </strong>: Young men and women (teens and young adults) <br>
<strong> How will this site be dynamic: </strong> Users will upload a photo of their face and the algorithm will calculate their face dimensions, account for their gender, and display sunglasses results appropriately <br>
<strong> How will this site use database: </strong> There will be a table that stores the face dimensions, and an algorithm that will calculate a "face score" that appropriately weights face width, face height, eye size, and mouth size.  There will then be a dimension table that will use one column for "dimension," which will be the face score, and each dimension will translate to a certain type of sunglasses. There are multiple sunglasses that fall under a certain type.  I will populate the types and sunglasses tables, and the dimension will populate itself based on the user's face dimensions.
<br>
<strong>Link / embedded database design  </strong><br>

<img src="TableRelationships.png" alt="Relationships" style="width:1000px;height:600px">

<?php
/**
 * Created by PhpStorm.
 * User: Aneesha
 * Date: 11/3/14
 * Time: 2:26 PM
 */


?>