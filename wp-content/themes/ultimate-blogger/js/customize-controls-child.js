( function( api ) {

	// Extends our custom "ultimate-blogger" section.
	api.sectionConstructor['ultimate-blogger'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );