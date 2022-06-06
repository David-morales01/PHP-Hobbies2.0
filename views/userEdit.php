{% extends "layouts/main.php" %}

{% block content %}


<div class="card">
    
    <form action="../editUsers" method="post" class="form">
        
    <input name="id" type="hidden"  value="{{id}}">
        <span class="text-title">
           
        </span>
        <label>
           <span> First Name </span>
            <input name="first_name" type="text" class=" {{errors.first_name}}" value="{{value.first_name}}">
        </label>
        <label>
            <span>Last Name </span>
            
            <input name="last_name" type="text" class="{{errors.last_name}}" value="{{value.last_name}}">
        </label>
        <span> Hobbies</span>
        {{value.hoobies}}
        <div class="hobbies">
            <label> Soccer  <input name="hobbies[0]"    type="checkbox"   value="soccer"  {% if value.hobbies[0] is not empty%}{{"checked"}}{% endif %}></label>
            <label> Sleep   <input name="hobbies[1]"    type="checkbox"   value="slepp"   {% if value.hobbies[1] is not empty%}{{"checked"}}{% endif %}></label>
            <label> Paint   <input name="hobbies[2]"    type="checkbox"   value="Paint"   {% if value.hobbies[2] is not empty%}{{"checked"}}{% endif %}></label>
            <label> Program <input name="hobbies[3]"    type="checkbox"   value="Program" {% if value.hobbies[3] is not empty%}{{"checked"}}{% endif %}></label>
        </div>
        <button class="button"> Save</button> 
    </form>
</div>

 
{% endblock %}