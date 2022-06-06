{% extends "layouts/main.php" %}

{% block content %}


<div class="card detail">
     
         
  <span class="text-title">
      User details
  </span>
  <p>
    First name   : {{value.first_name}} 
  </p> 
  <p>
    Last name   : {{value.last_name}} 
  </p>  
  <p> Hobbies : {{ value.hobbies }} </p>
        
</div>

 
{% endblock %}