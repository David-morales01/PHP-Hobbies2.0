{% extends "layouts/main.php" %}

{% block content %}


<div class="card">
    
    <form action="createUsers" method="post" class="form">
        
        <span class="text-title">
            Save USers
           
        </span>
        <label>
           <span> First Name </span>
            <input name="firstName" type="text" class=" {{errors.first_name}} firstName" value="{{value.firstName}}">
        </label>
        <label>
            <span>Last Name </span>
            
            <input name="lastName" type="text" class="{{errors.last_name}} lastName" value="{{value.lastName}}">
        </label>
        <span> Hobbies</span>
        {{value.hoobies}}
        <div class="hobbies">
            <label> Soccer  <input name="hobbies[0]"    type="checkbox"   value="soccer"
              {% if value.hobbies[0] is not empty%}{{"checked"}}{% endif %}> 
            </label>
            <label> Sleep   <input name="hobbies[1]"    type="checkbox"   value="slepp"
            {% if value.hobbies[1] is not empty%}{{"checked"}}{% endif %}
            
            ></label>
            <label> Paint   <input name="hobbies[2]"    type="checkbox"   value="Paint"
            {% if value.hobbies[2] is not empty%}{{"checked"}}{% endif %} ></label>
            <label> Program <input name="hobbies[3]"    type="checkbox"   value="Program"
            {% if value.hobbies[3] is not empty%}{{"checked"}}{% endif %} ></label>
        </div>
        <button class="button"> Save</button>
    </form>
</div>

 
{% endblock %}