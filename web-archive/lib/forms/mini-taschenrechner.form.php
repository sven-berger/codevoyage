<form method="POST" action="">
    <label for="erste_zahl">Erste Zahl</label>
    <input type="number" step="0.1" name="erste_zahl">

    <label for="zweite_zahl">Zweite Zahl</label>
    <input type="number" step="0.1" name="zweite_zahl">
    <label for="rechenoperation">Mathematische Operation</label>
    <select name="rechenoperation" id="rechenoperation">
        <option value="Addition">Addition</option>
        <option value="Subtraktion">Subtraktion</option>
        <option value="Multiplikation">Multiplikation</option>
        <option value="Division">Division</option>
    </select>

    <button type="submit">Berechnen</button>
    <button type="reset">Zurücksetzen</button>
</form>