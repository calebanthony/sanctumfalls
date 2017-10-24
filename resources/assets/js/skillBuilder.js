import Sortable from 'sortablejs'
import Tooltip from 'tooltip.js'

/*
 * Toggles the different skills in the builder.
 * The button ID ties to the div ID.
 * Button ID Example: #lmb-toggle
 * Accompanying Div ID: #lmb
 */
function toggleGuide(e) {
    // Don't submit the form.
    e.preventDefault();

    // Reset all the buttons
    document.querySelector('#lmb-toggle').classList.remove('is-active');
    document.querySelector('#rmb-toggle').classList.remove('is-active');
    document.querySelector('#f-toggle').classList.remove('is-active');
    document.querySelector('#q-toggle').classList.remove('is-active');
    document.querySelector('#e-toggle').classList.remove('is-active');
    document.querySelector('#talent-toggle').classList.remove('is-active');

    // Set the target to active
    e.target.classList.add('is-active');

    // Splice the button ID at '-' to get the div ID.
    var id = e.target.id.slice(0, e.target.id.indexOf('-'));

    // Set all the elements to be hidden.
    document.querySelector('#lmb').style.display = "none";
    document.querySelector('#rmb').style.display = "none";
    document.querySelector('#f').style.display = "none";
    document.querySelector('#q').style.display = "none";
    document.querySelector('#e').style.display = "none";
    document.querySelector('#talent').style.display = "none";

    // Set the selected element to show.
    document.getElementById(id).style.display = "block";
}

// Attach event listeners to the buttons
document.querySelector('#lmb-toggle').addEventListener('click', toggleGuide, false);
document.querySelector('#rmb-toggle').addEventListener('click', toggleGuide, false);
document.querySelector('#f-toggle').addEventListener('click', toggleGuide, false);
document.querySelector('#q-toggle').addEventListener('click', toggleGuide, false);
document.querySelector('#e-toggle').addEventListener('click', toggleGuide, false);
document.querySelector('#talent-toggle').addEventListener('click', toggleGuide, false);

/**
 * Let the skills be selected to put them into the skill build object
 */

var talents = document.querySelectorAll('.is-talent');
for (var i = 0; i < talents.length; i++) {
    talents[i].addEventListener('click', function(e) {
        var hero = document.querySelector('[hero]').getAttribute('hero').replace(/\s/g,'').toLowerCase();

        // Remove all styles first
        document.getElementById('talent1').classList.remove('selected-talent');
        document.getElementById('talent2').classList.remove('selected-talent');
        document.getElementById('talent3').classList.remove('selected-talent');

        // Highlight the correct one
        document.getElementById(e.target.id).classList.add('selected-talent');

        // Mark it in the bar at the bottom
        document.getElementById('build-talent')
                .innerHTML  = '<span class="fa"></span>'
                            + '<img src="/images/' + hero + '/' + e.target.innerHTML.replace(/\s/g,'').toLowerCase() + '.png"'
                            + "tooltip-title='" + e.target.getAttribute('tooltip-title') + "'>"
                            + '<p>' + e.target.innerHTML + '</p>';
        document.getElementById('build-talent').setAttribute('skill-name', e.target.id);

        // Set tooltip
        new Tooltip(document.getElementById('build-talent').getElementsByTagName('img')[0], {
            placement: 'bottom',
            title: document.getElementById('build-talent').getElementsByTagName('img')[0].getAttribute('tooltip-title'),
            html: true,
        })

        // Set it in the 'build' field
        getBuildOrder();
    })
}

var skills = document.querySelectorAll('.is-skill');
for (var i = 0; i < skills.length; i++) {
    skills[i].addEventListener('click', function(e) {
        var skillArray = e.target.id.split('_');

        var name = e.target.innerHTML;
        var skill = skillArray[0];
        var secondarySkill = skillArray[1];
        var tertiarySkill = skillArray[2];

        if (typeof tertiarySkill === 'undefined') {
            // This ONLY deals with secondary skills
            selectSecondary(skill, secondarySkill);
            setBuildStep(skill, secondarySkill);
        } else {
            if (!document.getElementById(skill + '_' + secondarySkill).classList.contains('selected-skill')) {
                selectSecondary(skill, secondarySkill);
            }
            selectTertiary(skill, secondarySkill, tertiarySkill);
            setBuildStep(skill, secondarySkill, tertiarySkill);
        }
    })
}

function selectSecondary(skill, secondarySkill) {
    clearTertiary(skill);
    document.getElementById(skill + '_left').classList.remove('selected-skill');
    document.getElementById(skill + '_right').classList.remove('selected-skill');
    document.getElementById(skill + "_" + secondarySkill).classList.add('selected-skill');
}

function selectTertiary(skill, secondarySkill, tertiarySkill) {
    selectSecondary(skill, secondarySkill);
    clearTertiary(skill);
    document.getElementById(skill + '_' + secondarySkill + '_' + tertiarySkill).classList.add('selected-skill');
}

function clearTertiary(skill) {
    document.getElementById(skill + '_left_left').classList.remove('selected-skill');
    document.getElementById(skill + '_left_right').classList.remove('selected-skill');
    document.getElementById(skill + '_right_left').classList.remove('selected-skill');
    document.getElementById(skill + '_right_right').classList.remove('selected-skill');
}

/**
 * Combine logic for clearing and then inserting hero build step
 */

function setBuildStep(skill, secondarySkill, tertiarySkill = '') {
    clearOldBuildStep(skill);

    if (tertiarySkill === '') { // We know that we're just setting one skill
        insertBuildStep(skill, secondarySkill, tertiarySkill);
    } else { // We are setting two skills
        insertBuildStep(skill, secondarySkill, ''); // Just the secondary
        insertBuildStep(skill, secondarySkill, tertiarySkill); // Then the tertiary
    }

    // Update the hidden field with the build order
    getBuildOrder();
}

/**
 * Handle the skill build when skills are selected
 */
function clearOldBuildStep(skill) {
    var levelBuild = document.querySelectorAll('.is-level-build');
    for (var i = 0; i < levelBuild.length; i++) {
        if (levelBuild[i].hasAttribute('id') && levelBuild[i].getAttribute('mappedskillid').includes(skill + '_')) {
            levelBuild[i].innerHTML = '';
            levelBuild[i].removeAttribute('id');
            levelBuild[i].removeAttribute('tooltip-title');
        }
    }
}

/**
 * Insert new skills to the skill builder order
 */
function insertBuildStep(skillId, secondarySkillId, tertiarySkillId) {
    var levelBuild = document.querySelectorAll('.is-level-build');
    var talentBuild = document.getElementById('build-talent')
    var hero = document.querySelector('[hero]').getAttribute('hero').replace(/\s/g,'').toLowerCase();

    // Check for talents first
    if (skillId === 'talent1' || skillId === 'talent2' || skillId === 'talent3') {
        var skill = document.getElementById(skillId)
        document.getElementById(skillId).click()
        return
    } else if (tertiarySkillId === '') {
        var skill = document.getElementById(skillId + '_' + secondarySkillId);
        var mappedSkillId = skillId + '_' + secondarySkillId;
    } else { // Get the tertiary skill name
        var skill = document.getElementById(skillId + '_' + secondarySkillId + '_' + tertiarySkillId);
        var mappedSkillId = skillId + '_' + secondarySkillId + '_' + tertiarySkillId;
    }

    // Grab the important values from the selected skill
    var strippedName = skill.innerHTML.replace(/\s/g,'');

    for (var i = 0; i < levelBuild.length; i++) {
        if (! levelBuild[i].hasAttribute('id')) {
            levelBuild[i].setAttribute('id', skillId + strippedName);
            levelBuild[i].setAttribute('mappedSkillId', mappedSkillId);

            levelBuild[i].innerHTML = '<span class="fa fa-arrows"></span>'
                                    + '<img src="/images/' + hero + '/' + skillId + '.png"'
                                    + "tooltip-title='" + skill.getAttribute('tooltip-title') + "'>"
                                    + '<p>' + skill.innerHTML + '</p>';

            // Set the tooltip
            new Tooltip(levelBuild[i].getElementsByTagName('img')[0], {
                placement: 'bottom',
                title: levelBuild[i].getElementsByTagName('img')[0].getAttribute('tooltip-title'),
                html: true,
            })
            break;
        }
    }
}

/**
 * Get the build order of all the skills
 */
function getBuildOrder() {
    var build = document.querySelectorAll('.is-level-build');
    var buildOrder = [];
    for (var i = 0; i < build.length; i++) {
        buildOrder.push(build[i].getAttribute('mappedSkillId'));
    }

    buildOrder.push(document.getElementById('build-talent').getAttribute('skill-name'));

    document.getElementById('buildOrder').value = buildOrder;
}

/**
 * Gets the existing build order if it's set (in editing a guide)
 */
function readBuildOrder() {
    var build = document.getElementById('buildOrder').value.split(',');

    for (var i = 0; i < build.length; i++) {
        var step = build[i].split('_');

        var skill = step[0];
        var secondarySkill = step[1];
        var tertiarySkill = step[2];

        // First we'll check if it's a talent
        if (skill === 'talent1' || skill === 'talent2' || skill === 'talent3') {
            setBuildStep(skill)
        }

        if (typeof tertiarySkill === 'undefined') {
            // This ONLY deals with secondary skills
            selectSecondary(skill, secondarySkill);
            setBuildStep(skill, secondarySkill);
        } else {
            selectTertiary(skill, secondarySkill, tertiarySkill);
            setBuildStep(skill, secondarySkill, tertiarySkill);
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    readBuildOrder();
})

/**
 * Initialize the sortable list of skills
 */
var sortable = new Sortable(document.getElementById('skill-level-breakdown'), {
    sort: true,
    delay: 0,
    animation: 150,
    draggable: '.is-level-build',

    onEnd: function(evt) {
        getBuildOrder();
    }
});

// Insert additional Pros and Cons
function getNewBullet(e) {
    // Don't submit the form
    e.preventDefault();

    // Get the lists
    var masterCons = document.getElementById('cons');
    var masterPros = document.getElementById('pros');

    // Create the pros first
    var proInput = document.createElement("input");
    proInput.setAttribute("class", "input");
    proInput.setAttribute("type", "text");
    proInput.setAttribute("name", 'pros[]');
    masterPros.appendChild(proInput);

    // Then create the cons
    var conInput = document.createElement("input");
    conInput.setAttribute("class", "input");
    conInput.setAttribute("type", "text");
    conInput.setAttribute("name", 'cons[]');
    masterCons.appendChild(conInput);
}

// Set up button to accept new bullet points
if (document.getElementById('listMore')) {
    document.getElementById('listMore').addEventListener('click', getNewBullet, false);
}
