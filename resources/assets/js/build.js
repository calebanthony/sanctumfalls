// Some fancy stuff that gives us just "/build/<hero>/" and strips the rest out
var baseUrl = location.pathname.split('/', 3).join('/')
if (baseUrl.substr(-1) != '/') baseUrl += '/';

document.addEventListener('click', updateURL, false);

function updateURL() {
    var build = document.getElementById('buildOrder').value.split(',')
    var newUrl = ''

    for (var i = 0; i < build.length; i++) {
        var skillStep = ''
        var skillArray = build[i].split('_');

        var skill = skillArray[0];
        var secondarySkill = skillArray[1];
        var tertiarySkill = skillArray[2];

        // Handle the skills first
        if (skill === 'lmb')              skillStep += 'a'
        if (skill === 'rmb')              skillStep += 'b'
        if (skill === 'f')                skillStep += 'c'
        if (skill === 'q')                skillStep += 'd'
        if (skill === 'e')                skillStep += 'e'

        // Now handle all the secondary steps
        if (tertiarySkill !== undefined) {
            if (secondarySkill === 'left')    skillStep += 'l'
            if (secondarySkill === 'right')   skillStep += 'r'
        } else {
            if (secondarySkill === 'left')    skillStep += 'lu'
            if (secondarySkill === 'right')   skillStep += 'ru'
        }

        // Finally the tertiary skills
        if (tertiarySkill === 'right')      skillStep += 'r'
        if (tertiarySkill === 'left')       skillStep += 'l'

        // Then handle the talents
        if (secondarySkill === undefined && skill !== '') {
            newUrl += `00${skill.split('talent')[1]}`
        }

        newUrl += skillStep
    }

    history.replaceState(null, null, baseUrl + newUrl)
}

// Called on page load to read the values of the build
function parseUrl() {
    var url = location.pathname.split('/')
    var build = url[url.length - 1].match(/.{3}/g)
    var buildPath = ''

    for (var i = 0; i < build.length; i++) {
        var buildStep = ''
        var steps = build[i].split('')

        // First handle the skill
        if (steps[0] === 'a')    buildStep += 'lmb'
        if (steps[0] === 'b')    buildStep += 'rmb'
        if (steps[0] === 'c')    buildStep += 'f'
        if (steps[0] === 'd')    buildStep += 'q'
        if (steps[0] === 'e')    buildStep += 'e'

        // If none of the above is true, it's likely a talent
        // The steps[2] is the talent ID
        if (steps[0] === '0') {
            buildStep += `talent${steps[2]}`
        }

        // Next handle the secondary skill
        if (steps[1] === 'r')    buildStep += '_right'
        if (steps[1] === 'l')    buildStep += '_left'

        // Finally handle the last skill
        if (steps[2] === 'r')    buildStep += '_right'
        if (steps[2] === 'l')    buildStep += '_left'

        // Add a comma for dealing with the next step
        buildStep += ','

        // Add it into the build path
        buildPath += buildStep
    }

    // Remove the trailing comma
    document.getElementById('buildOrder').value = buildPath.replace(/,+$/, "")
}

parseUrl()
