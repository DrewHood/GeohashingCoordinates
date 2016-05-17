<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Geohashing\Geohashing;
use App\Geohashing\GeohashingCoordinate;

class GeohashingController extends Controller
{
	/**
	 * Shows the coordinates for the string provided.
	 *
	 * @param String
	 * 
	 * @return void
	 */
	public function show(Request $request, String $sourceString)
	{
		$coordinate = Geohashing::calculateCoordinateOffsetsForString($sourceString);

		$debug = boolval($request->input('debug')); // This will be activated if anything is sent in.

		if (!$debug) {
			// Remove the debug info
			return json_encode(["latitudeOffset" => $coordinate->latitude, "longitudeOffset" => $coordinate->longitude]);
		}

		return json_encode($coordinate);
	}
}