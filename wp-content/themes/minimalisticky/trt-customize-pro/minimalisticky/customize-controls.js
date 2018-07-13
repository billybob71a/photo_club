( function( api ) {

	// Extends our custom "minimalisticky" section.
	api.sectionConstructor['minimalisticky'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
