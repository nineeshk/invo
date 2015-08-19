{{ content() }}

<div align="right">
    {{ link_to("robots/new", "Create Robots", "class": "btn btn-primary") }}
</div>
{% block scripts %}
<script>
$(document).ready(function(){
$("#a1").click(function(){
    });
});
</script>
{% endblock %}
{#
{{ form("robots/search") }}
<h2>Searc robots</h2>

<fieldset>

{% for element in form %}
    {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
{{ element }}
    {% else %}

<div class="control-group">
    {{ element.label(['class': 'control-label']) }}
    <div class="controls">
        {{ element }}
    </div>
</div>
    {% endif %}
{% endfor %}

<div class="control-group">
    {{ submit_button("Search", "class": "btn btn-primary") }}
</div>

</fieldset>

</form>
#}
<h2>Robots</h2>
{% for robot in robots %}
	{% if loop.first %}
		<table id="example_basic" class="table table-striped">
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Name</th>	
			<th>Type</th>
			<th>Year</th>
			<th>Who</th>
			<th>Type</th>
			<th></th>
		</tr>
	{% endif %}
		<tr>
			<td><a href="{{ url("robots/edit/" ~ robot.id) }}" title="">{{ loop.index }}</a></td>
			<td>{{ robot.id }}</td>
			<td>{{ robot.name }}</td>	
			<td>{{ robot.type }}</td>
			<td>{{ robot.year }}</td>
			<td>{{ robot.Outo.who }}</td>
			<td>{{ robot.RobotType.typeName}}</td>
			<td><a href="{{ url("robots/delete/" ~ robot.id) }}" id="a{{ robot.id }}" title="">Delete</a></td>
		</tr>
	{% if loop.last %}
		</table>
	{% endif %}
{% endfor %}
