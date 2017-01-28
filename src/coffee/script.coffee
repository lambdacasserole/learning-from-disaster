# Shows a survival probability to the user.
#
# @param [float] probability  the probability to display
#
window.showProbability = (probability) ->
  percentage = Math.round(probability * 100) # Convert to percentage.
  $('.results').show() # Show results row.
  $('.percentage').html percentage # Show percentage in document.
  comment = ''
  textColor = ''
  if percentage > 90
    comment = 'Almost definitely!'
    textColor = '#008000'
  else if percentage > 75
    comment = 'Yes, most likely!'
    textColor = '#71C837'
  else if percentage > 50
    comment = 'Probably, but it\'d be close.'
    textColor = '#FF6600'
  else if percentage > 25
    comment = 'Unlikely, but you might have a chance.'
    textColor = '#A05A2C'
  else
    comment = 'Sorry, almost certainly not.'
    textColor = '#FF0000'
  $('.probability').css 'color', textColor
  $('.comment').html comment

# Submits the user's input to the API and displays the result.
#
window.go = ->
  ageValue = $('#age').val() # Get field values.
  cabinClassValue = $('#cabin_class').val()
  sexValue = $('#sex').val()
  url = 'api.php?age=' + ageValue + '&class=' + cabinClassValue + '&sex=' + sexValue # Construct URL and query API.
  $.getJSON url, (data) ->
    showProbability data['probability'] # Show probability.
